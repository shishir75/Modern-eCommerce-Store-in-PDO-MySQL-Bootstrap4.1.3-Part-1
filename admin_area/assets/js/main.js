
// Delete Product Script
function DeleteProduct(product_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_product.php?product_id=" +product_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Product End


// Delete Product Category Script
function DeletePCat(p_cat_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_p_cat.php?p_cat_id=" +p_cat_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Product End


// Delete Product Category Script
function DeleteCat(cat_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_cat.php?cat_id=" +cat_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Product Category End


// Delete Slide Script
function DeleteSlide(slide_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_slide.php?slide_id=" +slide_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Slide End


// Delete Slide Script
function DeleteCustomer(customer_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_customer.php?customer_id=" +customer_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Slide End


// Delete Order Script
function DeleteOrder(order_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_order.php?order_id=" +order_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Order End


// Delete Payment Script
function DeletePayment(payment_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_payment.php?payment_id=" +payment_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Payment End


// Delete User Script
function DeleteUser(admin_id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, Delete",
      cancelButtonClass: "btn-info",
      cancelButtonText: "No, Back",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_user.php?admin_id=" +admin_id+ "";
        return true;

        swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    }); // Swal End
} // Delete Payment End