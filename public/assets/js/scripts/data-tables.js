/*
 * DataTables - Tables
 */

$(function () {
  // Page Length Option Table

  $("#page-length-option").DataTable({
    responsive: true,
    lengthMenu: [
      [10, 25, 50, -1],
      [10, 25, 50, "All"],
    ],
  });
});
