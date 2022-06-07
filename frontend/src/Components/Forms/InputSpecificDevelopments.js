import { specificDevelopmentsFields } from '../../data/form';

const InputSpecificDevelopments = ({ name, label, specificDevelopments, setSpecificDevelopments }) => {

    const handleChangeInputs = (evt, index) => {
        const newSpecificDevelopments = [...specificDevelopments];
        newSpecificDevelopments[index][evt.target.name] = evt.target.value;

        setSpecificDevelopments({
            name,
            value: newSpecificDevelopments,
        });
    };

    const addSpecificDev = (evt) => {
        evt.preventDefault();

        setSpecificDevelopments({
            name,
            value: [
                ...specificDevelopments,
                { ...specificDevelopmentsFields },
            ],
        });
    };

    const removeSpecificDev = (evt, index) => {
        evt.preventDefault();

        setSpecificDevelopments({
            name,
            value: specificDevelopments.filter((_, i) => i !== index),
        });
    };

    return (
        <div className="input-group">
            <span className="main-label">{label}</span>

            <div className="specific-template-list">
                {specificDevelopments.map((specificDevelopment, index) => (
                    <div className="specific-template" key={index}>
                        <label className="specific-template-name">
                            <span className="specific-template-input-prefix">
                                Nom
                            </span>
                            <input
                                type="text"
                                value={specificDevelopment.name}
                                name="name"
                                onChange={(evt) => {
                                    handleChangeInputs(evt, index);
                                }}
                            />
                        </label>

                        <label>
                            <input
                                type="number"
                                name="hours"
                                value={specificDevelopment.hours}
                                onChange={(evt) => {
                                    handleChangeInputs(evt, index);
                                }}
                            />
                            <span className="specific-template-input-unit">
                                h
                            </span>
                        </label>
                        <button className="button button-icon" type="button" onClick={(evt) => {
                            removeSpecificDev(evt, index);
                        }}>
                            <i className="fa fa-minus"></i>
                        </button>
                    </div>
                ))}
            </div>

            <button className="button button-icon" type="button" onClick={addSpecificDev}><i className="fa fa-plus"></i></button>
        </div>
    );
};

export default InputSpecificDevelopments;
