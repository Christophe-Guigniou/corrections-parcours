import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

import { getEstimate } from '../../api/model';

export const Estimate = () => {

    const { id } = useParams();

    const [estimate, setEstimate] = useState({});
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        getEstimate(id)
            .then((data) => {
                setEstimate(data);
                setIsLoading(false);
            });
    }, []);

    return (
        <>
            {!isLoading && <main className="main-content">
                <h1 className="main-title">Résultat de l'estimation</h1>
                <p className="project-name">
                    Estimations de temps pour le projet : {estimate.name}
                </p>
                <table className="table-result">
                    <thead>
                        <tr>
                            <th>Développements</th>
                            <th>Temps</th>
                        </tr>
                    </thead>
                    <tbody>
                        {estimate.lines.filter(dev => dev.type === 'general').map(development => (
                            <tr key={development.label}>
                                <td>
                                    {development.label}
                                </td>
                                <td>
                                    {development.time / 60}h
                                </td>
                            </tr>
                        ))}
                        <tr className="project-infos">
                            <td>
                                Spécificités
                            </td>
                            <td>
                                Temps supplémentaire
                            </td>
                        </tr>
                        {estimate.lines.filter(dev => dev.type === 'additional').map(development => (
                            <tr key={development.label}>
                                <td>
                                    {development.label}
                                </td>
                                <td>
                                    {development.time / 60}h
                                </td>
                            </tr>
                        ))}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                                {(estimate.total_time / 60).toFixed(1)}h
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </main>}
        </>
    );
};

export default Estimate;
