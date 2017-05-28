import React from 'react';
import { Link } from 'react-router';

const NotFoundPage = () => {
  return (
    <div>
      <h3>
        404 Page Not Found
      </h3>
      <Link to="/"> Go back to homepage </Link>
    </div>
  );
};

export default NotFoundPage;
