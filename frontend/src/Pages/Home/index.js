import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import { createEstimate, getItems } from '../../api/model';

import Button from '../../Components/Forms/Button';
import InputCheckboxes from '../../Components/Forms/InputCheckboxes';
import InputSelect from '../../Components/Forms/InputSelect';
import InputSpecificDevelopments from '../../Components/Forms/InputSpecificDevelopments';
import InputText from '../../Components/Forms/InputText';

const Home = () => {
    let navigate = useNavigate();

    const [projectName, setProjectName] = useState('');
    const [projectType, setProjectType] = useState('');
    const [designType, setDesignType] = useState('');
    const [genericDevelopments, setGenericDevelopments] = useState([]);
    const [specificDevelopments, setSpecificDevelopments] = useState([]);
    const [error, setError] = useState('');

    const [fields, setFields] = useState({});
    const [isLoading, setIsLoading] = useState(true);

    const calcEstimation = (evt) => {
        evt.preventDefault();
        const dataToSubmit = {
            projectName,
            projectType,
            designType,
            genericDevelopments,
            specificDevelopments,
        };

        setIsLoading(true);

        createEstimate(dataToSubmit)
            .then((estimation) => {
                setIsLoading(false);
                navigate('/estimation/' + estimation.id);
            })
            .catch(error => {
                setIsLoading(false);
                console.log(error.response.data);
                setError(error.response.data);
            });
    };

    useEffect(() => {
        getItems()
            .then((data) => {
                setFields(data);
                setIsLoading(false);
            });
    }, []);

    if (isLoading) {
        return <></>;
    }

    return (
        <main className="main-content">
            <h1 className="main-title">Calculator</h1>
            <form className="estimator-form" onSubmit={calcEstimation}>

                {error && <div className="errors">
                   {error.message}
                </div>}

                <InputText name={fields.projectName.slug} label={fields.projectName.name} value={projectName} setValue={setProjectName} />

                <InputSelect
                    label={fields.projectType.name}
                    selected={projectType}
                    setSelected={setProjectType}
                    options={[
                        { value: '', label: 'Choisir un type de projet' },
                        ...fields.projectType.values,
                    ]}
                />

                <InputCheckboxes
                    label={fields.genericDevelopments.name}
                    selected={genericDevelopments}
                    setSelected={setGenericDevelopments}
                    checkboxes={fields.genericDevelopments.values}
                />

                <InputSpecificDevelopments
                    label={fields.specificDevelopments.name}
                    specificDevelopments={specificDevelopments}
                    setSpecificDevelopments={setSpecificDevelopments}
                />

                <InputSelect
                    label={fields.designType.name}
                    selected={designType}
                    setSelected={setDesignType}
                    options={[
                        { value: '', label: 'Choisir un type de design' },
                        ...fields.designType.values
                    ]}
                />

                <Button type="submit">Calculer l'estimation</Button>

            </form>
        </main>
    );
};

export default Home;
