const InputSelect = ({ name, label, selected, setSelected, options }) => {
    const handleChange = (evt) => {
        const { name, value } = evt.target;
        setSelected({
            name,
            value,
        });
    };

    return (
        <div className="input-group">
            <span className="main-label">{label}</span>

            <select name={name} onChange={handleChange}>
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
