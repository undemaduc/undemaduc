import React, {Component} from 'react';
import PropTypes from 'prop-types';

import Navigation from './elements/Navigation';

class AppComponent extends Component {
	render() {
		return (
			<div className="umd-box">

				<Navigation />

				{this.props.children}
			</div>
		);
	}
}

AppComponent.propTypes = {
	children: PropTypes.element
};

export default AppComponent;
