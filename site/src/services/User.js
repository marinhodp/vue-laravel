import Service from './Service'

export default {
  list(callback) {
    let endpoint = 'user'
    Service.get(endpoint, (response) => {
      callback(response)
    })
  },
  save(data, callback) {
    let endpoint = 'user'
    Service.post(endpoint, data, (response) => {
      callback(response)
    })
  }
}
