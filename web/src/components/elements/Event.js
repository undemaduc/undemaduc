import React from 'react';

class Event extends React.Component {

    constructor(props) {
        super(props);
    }

    render () {

        return (
            <div className={"event hvr-float " + (this.props.hide ? "hide" : "show")}>
                <img className="event__image" src={this.props.image} alt="Untold Festival"/>
                <h3 className="event__title">{this.props.title}</h3>
                <p className="event__date">{this.props.date}</p>
            </div>
        );

    }

}

export default Event;
