function ajax(options) {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open(options.method || "GET", options.url, true);

        // Set request headers if provided
        if (options.headers) {
            Object.keys(options.headers).forEach((key) => {
                xhr.setRequestHeader(key, options.headers[key]);
            });
        }

        // Set up a callback for when the request is complete
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Resolve the promise with the response text
                resolve(xhr.responseText);
            } else {
                // Reject the promise with the status text
                reject(xhr.statusText);
            }
        };

        // Handle network errors
        xhr.onerror = function () {
            reject(xhr.statusText);
        };

        // Convert data object to query string
        const params = new URLSearchParams(options.data).toString();

        // Send the request with the data
        if (options.method && options.method.toUpperCase() === "POST") {
            xhr.setRequestHeader(
                "Content-Type",
                "application/x-www-form-urlencoded"
            );
            xhr.send(params);
        } else {
            xhr.send();
        }
    });
}
