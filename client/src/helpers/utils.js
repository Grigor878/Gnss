// Email Validator
export function isValidEmail(mail) {
  return /\S+@\S+\.\S+/.test(mail);
}
// random number
export function random(num) {
  return Math.floor(Math.random() * num);
}
// Current year
export function getCurrentYear() {
  return new Date().getFullYear();
}
