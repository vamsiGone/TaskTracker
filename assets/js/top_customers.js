"use strict";
var app = {
	main   : function () {
		"use strict";
		app.execute();
	},
	execute: function () {
		var table = "";
		table = $('#table').DataTable({
			"ajax": {
				"url": "assets/php_data/top_customers.txt",
				"dataSrc": ""
			},
			"fnDrawCallback": function () {

			},
			"columns": [
				{"data": null},
				{"data": "uniqueid"},
				{"data": "name"},
				{"data": "primary_mobile"},
				{"data": "last_week_usage"},
				{"data": "last_month_usage"},
				{"data": "total_usage"},
			],
			"order": [[0, 'asc']]
		});

		table.on('order.dt search.dt', function () {
			table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
				cell.innerHTML = i + 1;
			});
		}).draw();
	},
};
window.addEventListener('load', function () {
	app.main();
});