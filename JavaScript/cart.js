document.querySelector('#numberProducts').addEventListener('change',(e)=>{
    // the addeventListener will call the annmouse function and ad event "e" object to it if use change the number of prodcuts 

 let price=document.querySelector('#priceOfProduct').textContent.trim().split(' ')[0]; //trim will revmove the space from selecte price
 const QTY= +e.target.value // will return the number from input number so will retruen the number QTY that use want it 
 let totaPrice=  price*QTY; 

document.querySelector('#TotleOFprice').textContent=totaPrice+ ' SR'; // select the cell by id that should content the totalprice  ,then add the total price bu use textContent
//textContent will returnt the content insed tag ,and you can use it to change the content
})