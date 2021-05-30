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
  },
  remove(id, callback) {
    let endpoint = 'user'
    Service.delete(endpoint, id, (response) => {
      callback(response)
    })
  },
  get(id, callback) {
    let endpoint = 'user'
    Service.getOne(endpoint, id, (response) => {
      callback(response)
    })
  },
  edit(data, id, callback) {
    let endpoint = 'user'
    Service.edit(endpoint, data, id, (response) => {
      callback(response)
    })
  },
}
