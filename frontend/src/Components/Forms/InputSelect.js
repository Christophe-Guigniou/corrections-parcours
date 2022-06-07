const InputSelect = ({ label, selected, setSelected, options }) => {

    const handleChange = (evt) => {
        setSelected(evt.target.value);
    };

    return (
        <div className="input-group">
            <span className="main-label">{label}</span>

            <select name="project-type" onChange={handleChange}>
                {options.map(option => (
                    <option
                        key={option.value}
                        value={option.value}
                        defaultValue={selected === option.value}
                    >
                        {option.label}
                    </option>
                ))}
            </select>
        </div>
    );
};

export default InputSelect;
