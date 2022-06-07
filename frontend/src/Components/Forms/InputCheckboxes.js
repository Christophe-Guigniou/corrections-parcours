const InputCheckboxes = ({ name, label, selected, setSelected, checkboxes }) => {
    const handleChange = (evt) => {
        const { value } = evt.target;
        const values = [...selected];

        const newValue = values.includes(value)
            ? values.filter((v) => v !== value)
            : [...values, value];

        setSelected({
            name,
            value: newValue,
        });
    };

    return (
        <div className="input-group">
            <span className="main-label">{label}</span>
            {checkboxes.map(checkbox => (
                <div className="checkbox-group" key={checkbox.value}>
                    <input
                        type="checkbox"
                        id={checkbox.value}
                        name="generic-templates[]"
                        value={checkbox.value}
                        onChange={handleChange}
                        checked={selected.includes(checkbox.value)}
                    />
                    <label htmlFor={checkbox.value}>
                        {checkbox.label}
                    </label>
                </div>
            ))}
        </div>
    );
};

export default InputCheckboxes;
