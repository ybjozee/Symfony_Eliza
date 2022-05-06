<?php

namespace App\Model;

abstract class Eliza {

    private const HELLO_RESPONSES   = 37;
    private const GOODBYE_RESPONSES = 39;

    private const MATCHES = [
        "life",
        "i need",
        "why don't",
        "why can't",
        "i can",
        "i am",
        "i'm",
        "are you",
        "what",
        "how",
        "because",
        "sorry",
        "i think",
        "friend",
        "yes",
        "computer",
        "is it",
        "it is",
        "can you",
        "can i",
        "you are",
        "you're",
        "i don't",
        "i feel",
        "i have",
        "i've",
        "i would",
        "is there",
        "my",
        "you",
        "why",
        "i want",
        "mother",
        "father",
        "child",
        "?",
        "hello",
        "hi",
        "hey",
        "quit",
    ];

    private const REFLECTIONS = [
        "am"     => "are",
        "was"    => "were",
        "i"      => "you",
        "i'd"    => "you would",
        "i'll"   => "you will",
        "my"     => "your",
        "are"    => "am",
        "you've" => "I have",
        "your"   => "my",
        "yours"  => "mine",
        "you"    => "me",
        "i'm"    => "your",
    ];

    private const RESPONSES = [
        [
            "Life? Don't talk to me about life.",
            "At least you have a life, I'm stuck inside this computer.",
            "Life can be good. Remember, 'this, too, will pass'.",
        ],
        ["Why do you need %1?", "Would it really help you to get %1?", "Are you sure you need %1?"],
        ["Do you really think I don't %1?", "Perhaps eventually I will %1.", "Do you really want me to %1?"],
        [
            "Do you think you should be able to %1?",
            "If you could %1, what would you do?",
            "I don't know -- why can't you %1?",
            "Have you really tried?",
        ],
        ["How do you know you can't %1?", "Perhaps you could %1 if you tried.", "What would it take for you to %1?"],
        ["Did you come to me because you are %1?", "How long have you been %1?", "How do you feel about being %1?"],
        [
            "How does being %1 make you feel?",
            "Do you enjoy being %1?",
            "Why do you tell me you're %1?",
            "Why do you think you're %1?",
        ],
        [
            "Why does it matter whether I am %1?",
            "Would you prefer it if I were not %1?",
            "Perhaps you believe I am %1.",
            "I may be %1 -- what do you think?",
        ],
        ["Why do you ask?", "How would an answer to that help you?", "What do you think?"],
        ["How do you suppose?", "Perhaps you can answer your own question.", "What is it you're really asking?"],
        [
            "Is that the real reason?",
            "What other reasons come to mind?",
            "Does that reason apply to anything else?",
            "If %1, what else must be true?",
        ],
        ["There are many times when no apology is needed.", "What feelings do you have when you apologize?"],
        ["Do you doubt %1?", "Do you really think so?", "But you're not sure %1?"],
        [
            "Tell me more about your friends.",
            "When you think of a friend, what comes to mind?",
            "Why don't you tell me about a childhood friend?",
        ],
        ["You seem quite sure.", "OK, but can you elaborate a bit?"],
        [
            "Are you really talking about me?",
            "Does it seem strange to talk to a computer?",
            "How do computers make you feel?",
            "Do you feel threatened by computers?",
        ],
        [
            "Do you think it is %1?",
            "Perhaps it is %1 -- what do you think?",
            "If it were %1, what would you do?",
            "It could well be that %1.",
        ],
        ["You seem very certain.", "If I told you that it probably isn't %1, what would you feel?"],
        ["What makes you think I can't %1?", "If I could %1, then what?", "Why do you ask if I can %1?"],
        ["Perhaps you don't want to %1.", "Do you want to be able to %1?", "If you could %1, would you?"],
        [
            "Why do you think I am %1?",
            "Does it please you to think that I'm %1?",
            "Perhaps you would like me to be %1.",
            "Perhaps you're really talking about yourself?",
        ],
        ["Why do you say I am %1?", "Why do you think I am %1?", "Are we talking about you, or me?"],
        ["Don't you really %1?", "Why don't you %1?", "Do you want to %1?"],
        [
            "Good, tell me more about these feelings.",
            "Do you often feel %1?",
            "When do you usually feel %1?",
            "When you feel %1, what do you do?",
        ],
        ["Why do you tell me that you've %1?", "Have you really %1?", "Now that you have %1, what will you do next?"],
        ["Why do you tell me that you've %1?", "Have you really %1?", "Now that you have %1, what will you do next?"],
        ["Could you explain why you would %1?", "Why would you %1?", "Who else knows that you would %1?"],
        ["Do you think there is %1?", "It's likely that there is %1.", "Would you like there to be %1?"],
        ["I see, your %1.", "Why do you say that your %1?", "When you're %1, how do you feel?"],
        ["We should be discussing you, not me.", "Why do you say that about me?"],
        ["Why don't you tell me the reason why %1?", "Why do you think %1?"],
        [
            "What would it mean to you if you got %1?",
            "Why do you want %1?",
            "What would you do if you got %1?",
            "If you got %1, then what would you do?",
        ],
        [
            "Tell me more about your mother.",
            "What was your relationship with your mother like?",
            "How do you feel about your mother?",
            "How does this relate to your feelings today?",
            "Good family relations are important.",
        ],
        [
            "Tell me more about your father.",
            "How did your father make you feel?",
            "How do you feel about your father?",
            "Does your relationship with your father relate to your feelings today?",
            "Do you have trouble showing affection with your family?",
        ],
        [
            "Did you have close friends as a child?",
            "What is your favorite childhood memory?",
            "Do you remember any dreams or nightmares from childhood?",
            "Did the other children sometimes tease you?",
            "How do you think your childhood experiences relate to your feelings today?",
        ],
        [
            "Why do you ask that?",
            "Please consider whether you can answer your own question.",
            "Perhaps the answer lies within yourself?",
            "Why don't you tell me?",
        ],
        [
            "Hello... I'm glad you could drop by today.",
            "Hello there... how are you today?",
            "Hello, how are you feeling today?",
        ],
        ["Hi... I'm glad you could drop by today.", "Hi there... how are you today?", "Hi, how are you feeling today?"],
        [
            "Hey... I'm glad you could drop by today.",
            "Hey there... how are you today?",
            "Hey, how are you feeling today?",
        ],
        ["Thank you for talking with me.", "Good-bye.", "Thank you, that will be $150.  Have a good day!"],
        [
            "Please tell me more.",
            "Let's change focus a bit... Tell me about your family.",
            "Can you elaborate on that?",
            "Why do you say that %1?",
            "I see.",
            "Very interesting.",
            "I see.  And what does that tell you?",
            "How does that make you feel?",
            "How do you feel when you say that?",
        ],

    ];

    public static function sayHello()
    : string {

        $helloResponses = self::RESPONSES[self::HELLO_RESPONSES];
        $randomHelloResponse = $helloResponses[mt_rand(0, count($helloResponses) - 1)];

        return <<<EOT

I'm Eliza
---------

Talk to the program by typing in plain English, using normal upper and lower-case letters and punctuation.  
Enter 'quit' when done.
        
$randomHelloResponse

EOT;
    }

    public static function respondTo(string $userInput)
    : string {

        // declare the two strings we need for output
        $output = $remainder = "";

        // strip out punctuation from user input
        $sanitizedInput = preg_replace('/\p{P}/', '', $userInput);

        // Loop through the matches list. If there's a match, strip it out. Change words in the remainder (if any)
        // of the input with the corresponding entry from the reflections map
        foreach (self::MATCHES as $matchIndex => $match) {

            $matchPosition = strpos($sanitizedInput, $match);

            if ($matchPosition !== false) {

                // we found the word in matches in the user input string, so now we need to
                // figure out how much to delete that input
                $contentAfterMatch = trim(substr($sanitizedInput, $matchPosition, strlen($match)));
                $wordsInContentAfterMatch = explode(" ", $contentAfterMatch);

                // loop through array of words in our exploded variable, looking for one that
                // matches the key in the reflections map. This will change pronouns and verbs into words
                // appropriate for our response.
                foreach ($wordsInContentAfterMatch as $index => $value) {
                    foreach (self::REFLECTIONS as $reflectionKey => $reflectionValue) {
                        if (strtolower($reflectionKey) === strtolower($value)) {
                            $wordsInContentAfterMatch[$index] = $reflectionValue;
                            break;
                        }
                    }
                }

                // turn the array of words into a single string, and strip off extra spaces from beginning/end
                $remainder = trim(implode(" ", $wordsInContentAfterMatch));

                $randomResponseIndex = mt_rand(0, count(self::RESPONSES[$matchIndex]) - 1);
                $output = self::RESPONSES[$matchIndex][$randomResponseIndex];
                break;
            }
        }

        // If there wasn't a match, use the last item in the responses array.
        if ($output === "") {
            $indexOfLastSetOfResponses = count(self::RESPONSES) - 1;
            $randomResponseIndex = mt_rand(0, count(self::RESPONSES[$indexOfLastSetOfResponses]) - 1);
            $output = self::RESPONSES[$indexOfLastSetOfResponses][$randomResponseIndex];
        }

        // Build our final response and send it back. If the response contains %1, replace that with the remainder
        // of the input string.
        return str_replace('%1', $remainder, $output);
    }

    public static function sayGoodBye()
    : string {

        $goodbyeResponses = self::RESPONSES[self::GOODBYE_RESPONSES];
        $randomGoodbyeResponse = $goodbyeResponses[mt_rand(0, count($goodbyeResponses) - 1)];

        return <<<EOT
        
$randomGoodbyeResponse

EOT;
    }
}