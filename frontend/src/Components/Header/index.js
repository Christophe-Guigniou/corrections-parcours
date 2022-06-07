import { Link } from 'react-router-dom';

const Header = () => {
    return (
        <header className="header">
            <header className="main-header">
                <span className="site-name">Estimator</span>
                <nav className="main-nav">
                    <ul>
                        <li>
                            <Link to="/">Calculator</Link>
                        </li>
                        <li>
                            <Link to="/estimations">Estimations</Link>
                        </li>
                    </ul>
                </nav>
            </header>
        </header>
    );
};

export default Header;
