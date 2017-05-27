import React, { Component } from 'react';
import PropTypes from 'prop-types';

class LoginButtonComponent extends Component {
	constructor(props) {
		super(props);
	}

	render() {
		return (
			<div>
				<button type="button"
					className={this.props.className}
					onClick={this.props.onButtonClick}> {this.props.buttonLabel}
					{this.props.iconClassName ? <i className={this.props.iconClassName}></i> : null}
				</button>
			</div>
		);
	}
}

LoginButtonComponent.propTypes = {
	onButtonClick: PropTypes.func.isRequired,
	buttonLabel: PropTypes.string.isRequired,
	className: PropTypes.string.isRequired,
	iconClassName: PropTypes.string.isRequired
};

export default LoginButtonComponent;
