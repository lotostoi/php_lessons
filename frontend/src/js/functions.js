export class $ {
  static el = (val, cont = document) => cont.querySelector(val)
  static all = (val, cont = document) => cont.querySelectorAll(val)
  //static addClass = (_class) => dc.querySelectorAll(val)
}

export const _await = (time) =>
  new Promise((res) => {
    setTimeout(() => res(), time)
  })
