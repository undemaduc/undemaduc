import React, {Component} from 'react';
import PropTypes from 'prop-types';

class AppComponent extends Component {
	render() {
		return (
			<div className="umd-box">
				{this.props.children}
			</div>
		);
	}
}

AppComponent.propTypes = {
	children: PropTypes.element
};

export default AppComponent;
