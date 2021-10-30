const http = require('http');
const port = 8000;

const onRequest = (req, res) => {
    console.log(`Request recieved for ${req.url}`);

    if (req.url == '/home') {
        res.writeHead(200, { "Content-Type": "text/html" })
        res.write("<h1 style='text-align:center;'>Welcome to the Home Page</h1><br>Hello World");
    }
    else if (req.url == '/getData') {
        res.writeHead(200, { "Content-Type": "application/json" })
        const info = {name: "Isaac", class: "CS 341"}
        res.write(JSON.stringify(info));
    }
    else {
        res.writeHead(404, { "Content-Type": "text/html" })
        res.write("<h2>Page Not Found</h2>");
    }
    res.end();
}

const server = http.createServer(onRequest);
server.listen(port, () => { console.log(`Server listening on port ${port}`) });