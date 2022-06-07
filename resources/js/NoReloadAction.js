function DeleteRow(btnDel) {
    var btn = e.target;
    $(btn).closest("tr").remove();
}