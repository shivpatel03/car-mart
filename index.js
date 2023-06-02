function typeSelected(param){
    // Check browser support
    if (typeof(Storage) !== "undefined") {
    // Store
    localStorage.setItem("type",param);
    }
}