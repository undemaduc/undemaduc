import React from 'react';

const UserLoginPage = () => {
  return (
      <div className="umd-setup-container umd-login-page">

          <h1 className="setup__title">I'm</h1>

          <div className="dropdown umd-dropdown">
              <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  looking for
              </button>
              <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a className="dropdown-item" href="#">offering</a>
              </div>
          </div>

          <h1 className="setup__title">a place.</h1>



      </div>
  );
};

export default UserLoginPage;
