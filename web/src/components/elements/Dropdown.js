class Dropdown extends React.Component {

    render() {
        return (
            <div className="dropdown umd-dropdown">
                <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    looking for
                </button>
                <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a className="dropdown-item" data-login-type="location-user" onClick={switchLoginType} href="#">offering</a>
                </div>
            </div>
        );
    }

}