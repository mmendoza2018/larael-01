function enviarData2 (form){
  event.preventDefault();
  let formData2 = new FormData(form);
  for (var pair of formData2.entries()) {
      formData1.append(pair[0], pair[1]);
  }

  for (var pair of formData1.entries()) {
      console.log(pair[0] + ": " + pair[1]);
  }
};