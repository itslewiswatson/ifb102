const port = 5000;

// Express
let express = require("express");
let app = express();

// DB Connection
let mysql = require("mysql");
let conn;

let tryConnection = function() {
	conn = mysql.createConnection({
		host: "mysql",
		user: "root",
		password: "local",
		database: "ifb102",
		insecureAuth: true
	});
	conn.connect((err) => {
		if (err) {
			console.error("Couldn't connect to database: " + err.message);
			setTimeout(tryConnection, 5000);
			return;
		}
		console.log("Successfully connected to the database");
	});
};
tryConnection();

// Route
app.get("/", (req, res) => {
	conn.query("SELECT * FROM __api__keys", (err, result) => {
		if (err) {
			return res.send({"error": err});
		}
		res.send({"data": result});
	});
});

// Listen
app.listen(port, () => {
	console.log("Listening on port " + port);
});