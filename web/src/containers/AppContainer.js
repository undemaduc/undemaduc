import React, { Component } from 'react';
import PropTypes from 'prop-types';

import ConnectedNavigation from '../connected/ConnectedNavigation';

class AppComponent extends Component {
	constructor(props) {
		super(props);		
	}

	render() {
		return (
			<div className="umd-box">
				<ConnectedNavigation />

				{this.props.children}
			</div>
		);
	}
}

AppComponent.propTypes = {
	children: PropTypes.element
};

export default AppComponent;
