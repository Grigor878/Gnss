// Capitalize
// export function capitalize(string) {
//   return string.charAt(0).toUpperCase() + string.slice(1);
// }

// capitalize text
export function capitalizeText(inputText) {
  const words = inputText.split(" ");
  const capitalizedWords = words.map((word) => {
    if (word.length > 0) {
      return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    } else {
      return "";
    }
  });
  return capitalizedWords.join(" ");
}

// split before "/"
export function splitBefore(str) {
  return str.split("/")[0];
}
// split after "/"
export function splitAfter(str) {
  return str.split("/")[1];
}
// money formater
export function moneyFormater(num) {
  let usd = Intl.NumberFormat("en-US");
  let formated = "$ " + usd.format(num);
  return formated;
}

// money formater without $ symbol
export function moneyFormaterNoUsd(num) {
  let usd = Intl.NumberFormat("en-US");
  let formated = usd.format(num);
  return formated;
}

// date formatter for deactivate home
export function formatDateString(date) {
  const isoString = date.toISOString();
  const formattedDate = isoString.replace("T", " ").split(".")[0];
  return formattedDate;
}
