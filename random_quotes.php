<?php
// Array of quotes
$quotes = [
    "Be yourself; everyone else is already taken. - Oscar Wilde",
    "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe. - Albert Einstein",
    "In three words I can sum up everything I've learned about life: it goes on. - Robert Frost",
    "The only way to do great work is to love what you do. - Steve Jobs",
    "Life is what happens when you're busy making other plans. - John Lennon",
    "I always tell the truth. Even when I lie. - Scarface",
    "The Only Thing Standing Between You And Your Goal Is The Bulls**t Story You Keep Telling Yourself As To Why You Can't Achieve It. - Jordan Belfort",
    "Sell Me This Pen. - Jordan Belfort" 
];

// Get a random index
$randomIndex = array_rand($quotes);

// Return the random quote
echo $quotes[$randomIndex];
?>
