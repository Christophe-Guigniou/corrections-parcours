const InputText = ({ name, label, value, setValue, type = 'text' }) => {
    const handleChange = (evt) => {
        setValue(evt.target.value);
    };

    return (
        <div className="input-group">
            <label className="main-label" htmlFor={name}>{label}</label>
            <input type={type} id={name} name={name} placeholder="Nom" value={value} onChange={handleChange}/>
        </div>
    );
};

export default InputText;
