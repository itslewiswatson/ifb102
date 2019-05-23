const port = 3000;

let express = require("express");
let app = express();

app.get("/", (req, res) => {
	res.send(";)");
});

app.listen(port, () => {
	console.log("Listening on port " + port);
});