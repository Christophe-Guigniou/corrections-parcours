const InputText = ({ name, label, value, setValue, type = 'text' }) => {
    const handleChange = (evt) => {
        const { name, value } = evt.target;
        setValue({
            name,
            value,
        });
    };

    return (
        <div className="input-group">
            <label className="main-label" htmlFor={name}>{label}</label>
            <input
                type={type}
                id={name}
                name={name}
                placeholder="Nom"
                value={value}
                onChange={handleChange}
            />
        </div>
    );
};

export default InputText;
