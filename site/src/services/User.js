import Service from './Service'

export default {
  list(callback) {
    let endpoint = 'user'
    Service.get(endpoint, (response) => {
      callback(response)
    })
  }
}
