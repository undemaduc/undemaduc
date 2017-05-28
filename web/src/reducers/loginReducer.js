
import update from 'immutability-helper';

import {
    LOGGING_IN,

    USER_LOGIN_SUCCEEDED,
    LUSER_LOGIN_SUCCEEDED,

    LOGIN_FAILED
} from '../actions/loginActions';

const initialState = {
    isLoggingIn: false,
    user: {},
    luser: {}
};

export const user = (state = initialState, action) => {
    switch (action.type) {
        case LOGGING_IN:
            return update(state, {
                isLoggingIn: { $set: true }
            });

        case USER_LOGIN_SUCCEEDED:
            return update(state, {
                isLoggingIn: { $set: false },
                user: { $set: action.data }
            });

        case LUSER_LOGIN_SUCCEEDED:
            return update(state, {
                isLoggingIn: { $set: false },
                luser: { $set: action.data }
            });

        case LOGIN_FAILED:
            return update(state, {
                isLoggingIn: { $set: false }
            });

        default:
            return state;

    }
}