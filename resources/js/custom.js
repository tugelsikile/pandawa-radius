function cbxAll(ob) {
    let table = $(ob).parents('table');
    $(table).find('tbody input:checkbox').prop({'checked':$(ob).prop('checked')});
}