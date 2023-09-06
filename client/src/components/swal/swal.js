import Swal from "sweetalert2";
import "sweetalert2/src/sweetalert2.scss";

export function success(text) {
  Swal.fire({
    // position: "bottom-left",
    icon: "success",
    title: `<h6>${text}</h6>`,
    showConfirmButton: false,
    timer: 1000,
    customClass: "swal",
  });
}

export function oops(text) {
  Swal.fire({
    icon: "error",
    title: `<h6>${text}</h6>`,
    showConfirmButton: false,
    timer: 1000,
    customClass: "swal",
  });
}
