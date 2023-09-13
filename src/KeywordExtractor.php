<?php

namespace KeyWordExtractor;


class KeyWordExtractor
{

    public function extractKeywords($description,$lang = 'en')
    {
    
        // Detect the language of the description
        $language = 'en';
    
        // Tokenize the description text
        $words = str_word_count($description, 1, '0123456789'); // Include digits
    
        // Remove stopwords based on language (customize for your needs)
        $stopwords = $this->getStopwordsForLanguage($language);
        $filteredWords = array_diff($words, $stopwords);
    
        // Count word frequencies
        $wordFrequencies = array_count_values($filteredWords);
    
        // Sort words by frequency (descending order)
        arsort($wordFrequencies);
    
        // Get the top N keywords
        $keywords = array_keys(array_slice($wordFrequencies, 0));
    
        return $keywords;
    }
    
    public function getStopwordsForLanguage($language)
    {
        // Define stopwords for various languages (add more as needed)
        $stopwords = [
            'en' => ["a","able","about","above","according","accordingly","across","actually","after","afterwards","again","against","ain't","all","am","an","and","any","are","aren't","as","at","be","because","became","become","becomes","becoming","been","before","beforehand","behind","being","believe","below","beside","besides","best","better","between","beyond","both","brief","but","by","c'mon","c's","came","can","can't","cannot","cant","cause","causes","certain","certainly","changes","clearly","co","com","come","comes","concerning","consequently","consider","considering","contain","containing","contains","corresponding","could","couldn't","course","currently","definitely","described","despite","did","didn't","different","do","does","doesn't","doing","don't","done","down","downwards","during","each","edu","eg","eight","either","else","elsewhere","enough","entirely","especially","et","etc","even","ever","every","everybody","everyone","everything","everywhere","ex","exactly","example","except","far","few","fifth","first","five","followed","following","follows","for","former","formerly","forth","four","from","further","furthermore","get","gets","getting","given","gives","go","goes","going","gone","got","gotten","greetings","had","hadn't","happens","hardly","has","hasn't","have","haven't","having","he","he's","hello","help","hence","her","here","here's","hereafter","hereby","herein","hereupon","hers","herself","hi","him","himself","his","how","how's","i","i'd","i'll","i'm","i've","if","in","indeed","indicate","indicated","indicates","inner","insofar","instead","into","inward","is","isn't","it","it's","its","itself","just","keep","keeps","kept","know","known","knows","last","lately","later","latter","latterly","least","less","lest","let","let's","like","liked","likely","little","look","looking","looks","ltd","mainly","many","may","maybe","me","mean","meanwhile","merely","might","more","moreover","most","mostly","much","must","my","myself","name","namely","nd","near","nearly","necessary","need","needs","neither","never","nevertheless","new","next","nine","no","nobody","non","none","noone","nor","normally","not","nothing","novel","now","nowhere","obviously","of","off","often","oh","ok","okay","old","on","once","one","ones","only","onto","or","other","others","otherwise","ought","our","ours","ourselves","out","outside","over","overall","own","particular","particularly","per","perhaps","placed","please","plus","possible","presumably","probably","provides","que","quite","qv","rather","rd","re","really","reasonably","regarding","regardless","regards","relatively","respectively","right","said","same","saw","say","saying","says","second","secondly","see","seeing","seem","seemed","seeming","seems","seen","self","selves","sensible","sent","serious","seriously","seven","several","shall","she","should","shouldn't","since","six","so","some","somebody","somehow","someone","something","sometime","sometimes","somewhat","somewhere","soon","sorry","specified","specify","specifying","still","sub","such","sup","sure","t's","take","taken","tell","tends","th","than","thank","thanks","thanx","that","that's","thats","the","their","theirs","them","themselves","then","thence","there","there's","thereafter","thereby","therefore","therein","theres","thereupon","these","they","they'd","they'll","they're","they've","think","third","this","thorough","thoroughly","those","though","three","through","throughout","thru","thus","to","together","too","took","toward","towards","tried","tries","truly","try","trying","twice","two","un","under","unfortunately","unless","unlikely","until","unto","up","upon","us","use","used","useful","uses","using","usually","value","various","very","via","viz","vs","want","wants","was","wasn't","we","we'd","we'll","we're","we've","welcome","well","went","were","weren't","what","what's","whatever","when","when's","where","where's","whereafter","whereas","whereby","wherein","whereupon","wherever","whether","which","while","whither","who","who's","whoever","whole","whom","why","why's","will","willing","wish","with","within","without","won't","wonder","would","wouldn't","yes","yet","you","you'd","you'll","you're","you've","your","yours","yourself","yourselves","zero"],
            'fr' => ['le', 'la', 'et', 'de', 'à'],
            // Add more languages and stopwords here
        ];
    
        return $stopwords[$language] ?? [];
    }
    
}
