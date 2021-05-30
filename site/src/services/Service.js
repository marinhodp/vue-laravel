import axios from 'axios'

const API_URL = process.env.VUE_APP_URL_API

export default {
  post(endpoint, body, callback) {
    let url = `${API_URL}/${endpoint}`
    axios.post(url, body, {})
    .then((response) => {
      let msg = {
        'success': true,
        'data': response.data
      }
      callback(msg)
    })
    .catch((errors) => {
      let response = errors.response.request.responseText
      let msg = {
        'success': false,
        'errors': JSON.parse(response)
      }
      callback(msg)
    })
  },
  get(endpoint, callback) {
    let url = `${API_URL}/${endpoint}`
    axios.get(url, {})
    .then((response) => {
      let msg = {
        'success': true,
        'data': response.data
      }
      callback(msg)
    })
    .catch((errors) => {
      let msg = {
        'success': false,
        'errors': errors
      }
      callback(msg)
    })
  },
}
