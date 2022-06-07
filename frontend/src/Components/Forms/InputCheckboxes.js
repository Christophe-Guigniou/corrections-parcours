const InputCheckboxes = ({ label, selected, setSelected, checkboxes }) => {

    const handleChange = (evt) => {
        if (selected.includes(evt.target.value)) {
            setSelected(selected.filter((item) => item !== evt.target.value));
        } else {
            setSelected([...selected, evt.target.value]);
        }
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
