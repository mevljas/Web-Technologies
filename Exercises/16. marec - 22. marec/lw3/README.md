# Exercise
## Assignment 1: Complete JS App
- When the user provides the first name, the last
name and the role, the participant should be
added to the list (table) of participants
- When the user double-clicks on a participant
(row), the participant should be removed from
the list
    - The user should be prompted to confirm the
removal: use confirm to prompt the user


## Assignment 2: Persistence
- Problem: When the page is refreshed, data is lost
- Solution: use HTML5 localStorage to save the contents
    - https://www.w3schools.com/html/html5_webstorage.asp
- Some hints
    - Represent each participant as an object with four properties:
id, first, last, role
- The id should be an integer that increases with each participant
    - Add participants to an array, and save the array to
localStorage
    - Since localStorage cannot save arrays, encode the array as
JSON and save the JSON to localStorage:
        - JSON.stringify([1, 2, 3])
        - JSON.parse(stringToBeParsed)
