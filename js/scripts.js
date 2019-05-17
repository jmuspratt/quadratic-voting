
$(document).ready(function() {


function tokenCost(voteCount) {
  return Math.pow(voteCount, 2);
}

function tokensRemaining() {
  var totalTokensUsed = 0;
  $('.target-votes').each(function(){
    var thisVoteCount = parseInt($(this).text());
    totalTokensUsed += tokenCost(thisVoteCount);
  });
  return 100 - totalTokensUsed;
}

function serializeVote() {
  var vote_array = [];
  var params = '';
  $('.target').each(function(){
    var candidate = $(this).find('.candidate__name').html();
    var candidate_votes = parseInt($(this).find('.target-votes').html());
    params+= candidate + '=' + candidate_votes + '&';
  });
    return params;
}

  var $remaining = $('.js-remaining');
  var $btn = $('.btn');
  var $vote = $('#vote');

  $btn.click(function(e){
    e.preventDefault();
    $parent = $(this).closest('.target');
    $thisCandVoteCounter = $parent.find('.target-votes');
    $thisCandVoteTokens = $parent.find('.target-tokens');

    var voteCount = parseInt($thisCandVoteCounter.html());
    
    var newVoteCount = $(this).hasClass('btn--minus') ? voteCount - 1 : voteCount + 1;
  
    // console.log('new vote count is ', newVoteCount);

    var thisTokenCost = parseInt(tokenCost(newVoteCount));

    
    // update this candidate's vote count and tokens
    $thisCandVoteCounter.html(newVoteCount);
    $thisCandVoteTokens.html(thisTokenCost + ' tokens');

    // update remaining count
    var newRemainingCount = tokensRemaining();
    $remaining.html(newRemainingCount);

    // toggle submit disabled statlye
    $('.quadratic-submit').prop('disabled', newRemainingCount < 0);

    // update hidden input
    $vote.prop('value', serializeVote() );
  });

});
