import { useEffect, useReducer, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import { createEstimate, getItems } from '../../api/model';

import Button from '../../Components/Forms/Button';
import InputCheckboxes from '../../Components/Forms/InputCheckboxes';
import InputSelect from '../../Components/Forms/InputSelect';
import InputSpecificDevelopments from '../../Components/Forms/InputSpecificDevelopments';
import InputText from '../../Components/Forms/InputText';

const initialState = {
    projectName: '',
    projectType: '',
    designType: '',
    genericDevelopments: [],
    specificDevelopments: [],
};

const reducer = (state, newVal) => ({ ...state, ...newVal });

const Home = () => {
    const navigate = useNavigate();

    const [state, dispatch] = useReducer(reducer, initialState);

    const [error, setError] = useState('');

    const [fields, setFields] = useState({});
    const [isLoading, setIsLoading] = useState(true);

    const calcEstimation = (evt) => {
        evt.preventDefault();

        setIsLoading(true);
        console.log(state);
        createEstimate(state)
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

    /**
     * @param {{ name: string, value: string|string[]}} target
     */
    const handleChange = (target) => {
        const { name, value } = target;
        dispatch({ [name]: value });
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

    const {
        projectName,
        projectType,
        designType,
        genericDevelopments,
        specificDevelopments,
    } = state;

    return (
        <main className="main-content">
            <h1 className="main-title">Calculator</h1>
            <form className="estimator-form" onSubmit={calcEstimation}>

                {error && <div className="errors">
                   {error.message}
                </div>}

                <InputText name={fields.projectName.slug} label={fields.projectName.name} value={projectName} setValue={handleChange} />

                <InputSelect
                    name="projectType"
                    label={fields.projectType.name}
                    selected={projectType}
                    setSelected={handleChange}
                    options={[
                        { value: '', label: 'Choisir un type de projet' },
                        ...fields.projectType.values,
                    ]}
                />

                <InputCheckboxes
                    name="genericDevelopments"
                    label={fields.genericDevelopments.name}
                    selected={genericDevelopments}
                    setSelected={handleChange}
                    checkboxes={fields.genericDevelopments.values}
                />

                <InputSpecificDevelopments
                    name="specificDevelopments"
                    label={fields.specificDevelopments.name}
                    specificDevelopments={specificDevelopments}
                    setSpecificDevelopments={handleChange}
                />

                <InputSelect
                    name="designType"
                    label={fields.designType.name}
                    selected={designType}
                    setSelected={handleChange}
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
