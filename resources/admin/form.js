export default class Form {
  constructor(data) {
    this.originalData = data;
    
    for(let field in data) {
      this[field] = data[field];
    }
    
    this.errors = new Errors();
  }
  data() {
    let data = {};
    //originalData is {name: "", description: ""}
    for (let property in this.originalData) {
      data[property] = this[property];
    }
    return data;
  }
  onSuccess(data) {
    alert(data.message);
    this.reset();
  }
  onFail(errors) {
    this.errors.record(errors);
  }
  //expose behaviour that it can be reset and submitted
  reset() {
    for(let field in this.originalData) {
      this[field] = "";
    }
    this.errors.clear();
    
  }
  submit(requestType, url) {
    //when success, call resolve
    //when fail, call reject
    return new Promise((resolve, reject) => {
      
      axios[requestType](url, this.data())
        .then(response => {
          this.onSuccess(response.data);
          resolve(response.data);
          //i have the info what do you want to do with it
        })
        .catch(error => {
          this.onFail(error.response.data);
          reject(error.response.data);
        });
    });
  }
  post(url) {
    return this.submit('post', url);
  }
  get(url) {
    return this.submit('get', url);
  }
}