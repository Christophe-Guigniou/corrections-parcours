import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

import { getEstimates } from '../../api/model';

const EstimateList = () => {

    const [estimates, setEstimates] = useState([]);

    // fake estimations
    useEffect(() => {
        getEstimates()
            .then((data) => {
                setEstimates(data);
            });
    }, []);

    return (
        <main className="main-content">
            <h1 className="main-title">Dernières estimations</h1>
            <ul className="estimation-list">
                {estimates && estimates.map(estimation => (
                    <li key={estimation.id}>
                        <Link to={`/estimation/${estimation.id}`} className="estimation-card">
                            <span className="project-name">{estimation.name}</span>
                            <span className="project-time">{(estimation.total_time / 60).toFixed(1)}h</span>
                        </Link>
                    </li>
                ))}
            </ul>
        </main>
    );
};

export default EstimateList;
