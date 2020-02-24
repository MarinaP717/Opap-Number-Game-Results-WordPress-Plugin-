function getUrl(gameid){
  let url = "https://api.opap.gr/draws/v3.0/" + gameid + "/last/2";
  return url;
}

//Fetch draw date
function gameDate(game, drawTime) {

  let date = new Date(drawTime);
  let dayString = days[date.getDay()];
  day = date.getDate();
  month = date.getMonth() + 1;
  year = date.getFullYear();
  let GDate = document.createElement("DIV");
  GDate.className = game + "-time";
  GDate.innerHTML = dayString + " " + day + "/" + month + "/" + year;
  jQuery("." + game + "-results").append(GDate);
}

//Fetch draw numbers
function gameNumbers(game, data){

  let numbers = document.createElement("DIV");
  numbers.className = game + "-numbers";
  jQuery("." + game + "-results").append(numbers);
  let l = data[1].winningNumbers.list.length;
  for (let y=0; y<l; y++) {
    let number = document.createElement("DIV");
    number.className = game +"-num";
    number.innerHTML =data[1].winningNumbers.list[y];
    numbers.append(number);
  }
  if (data[1].winningNumbers.bonus) {
    bonus = document.createElement("DIV");
    bonus.className = game + "-bonus";
    bonus.innerHTML =data[1].winningNumbers.bonus[0];
    if (game == "lotto") {
      lottoPlus = document.createElement("DIV");
      lottoPlus.className = "lotto-plus";
      lottoPlus.innerHTML=" + ";
      numbers.append(lottoPlus);
    }
    numbers.append(bonus);
  }
}

const days = ['Κυριακή', 'Δευτέρα', 'Τρίτη', 'Τετάρτη', 'Πέμπτη', 'Παρασκευή', 'Σάββατο'];

//Fetch game
function gameJSON(game, id) {
  
    let url = getUrl(id);
    fetch(url)
    .then(resp => resp.json()
        .then(data => {
      console.log(data);
      let ddate = data[1].drawTime;
      gameDate(game, ddate);
      gameNumbers(game, data);
  })
  ).catch(function (err) {
      console.log('Fetch Error : ', err);
  });
}

gameJSON("tzoker", "5104");
gameJSON("lotto", "5103");
gameJSON("proto", "2101");

