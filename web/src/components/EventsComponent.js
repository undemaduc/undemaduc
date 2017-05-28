import React, { Component } from 'react';
import Event from './elements/Event';
import autoBind from 'react-autobind';

class EventsComponent extends React.Component {

    constructor(props) {
        super(props);
        autoBind(this);

        this.state = {
            events : [
                {
                    title: 'Untold 1',
                    date: 'August 22-25, 2017',
                    image: require('../images/events/untold.jpg'),
                    hide: false
                },
                {
                    title: 'Untold 2',
                    date: 'August 22-25, 2017',
                    image: require('../images/events/untold.jpg'),
                    hide: false
                },
                {
                    title: 'Untold 3',
                    date: 'August 22-25, 2017',
                    image: require('../images/events/untold.jpg'),
                    hide: false
                },
                {
                    title: 'Untold 4',
                    date: 'August 22-25, 2017',
                    image: require('../images/events/untold.jpg'),
                    hide: false
                }
            ]
        }
    }

    render() {
        return (
            <div className="umd-events">
                <div className="d-flex justify-content-between align-items-center">
                    <h2 className="umd-events__title">Events</h2>

                    <div className="d-flex justify-content-between umd-events__navigation">

                        <i className="demo-icon icon-back-arrow navigation__icon" onClick={this.previousEvent}></i>
                        <i className="demo-icon icon-right-arrow navigation__icon" onClick={this.nextEvent}></i>

                    </div>
                </div>
                
                <div className="events-container d-flex justify-content-between">
                    {this.state.events.map(function(event, i) {
                        return <Event image={event.image} title={event.title} date={event.date} hide={event.hide} />
                    })}
                </div>
            </div>
        );
    }

    nextEvent () {

        var flagged = false;
        var count = this.state.events.length;

        const eventsMapped = this.state.events.map(function(event, i) {

            if (false == event.hide && !flagged && i !== count - 1) {
                event.hide = true;
                flagged = true;
            }

            return event;

        });

        this.setState({
            events: eventsMapped
        });
    }

    previousEvent () {
        var flagged = false;

        const eventsMapped = this.state.events.slice(0).reverse().map(function(event, i) {

            if (true == event.hide && !flagged && i != 0) {
                event.hide = false;
                flagged = true;
            }

            return event;

        });

        this.setState({
            events: eventsMapped.slice(0).reverse()
        });
    }

}

export default EventsComponent;