
import { browserHistory } from 'react-router';
import axios from 'axios';

export const LOGGING_IN = 'LOGGING_IN';
export const USER_LOGIN_SUCCEEDED = 'USER_LOGIN_SUCCEEDED';
export const LUSER_LOGIN_SUCCEEDED = 'LUSER_LOGIN_SUCCEEDED';

// error types
export const LOGIN_FAILED = 'LOGIN_FAILED';


export function loginUser(email, password) {
    return dispatch => {
        return _login(email, password, false, {
            succeeded: USER_LOGIN_SUCCEEDED
        }, dispatch);
    };
}

export function loginLuser(email, password) {
    return dispatch => {
        return _login(email, password, true, {
            succeeded: LUSER_LOGIN_SUCCEEDED
        }, dispatch);
    };
}

function _login(email, password, isLuser, types, dispatch) {
    dispatch({ type: LOGGING_IN });

    return axios({
        method: 'post',
        url: isLuser ? '/luser/login' : '/user/login',
        baseURL: 'http://undemaduc.lo',
        data: { email, password }
    }).then(response => {
        dispatch({ type: types.succeeded, data: response.data });

        if (isLuser) {
            browserHistory.push('/match');
        } else {
            browserHistory.push('/events');
        }
    }).catch(error => {
        dispatch({ type: LOGIN_FAILED, error });
    });
}