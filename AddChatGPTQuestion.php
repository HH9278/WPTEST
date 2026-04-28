function add_chatgpt_button($content) {
    if (is_single()) {
        $button = '
        <div style="margin-top:20px;">
            <textarea id="question" placeholder="この記事について質問" style="width:100%;height:80px;"></textarea><br>
            <button onclick="askChatGPT()">ChatGPTに質問</button>
        </div>

        <script>
        function askChatGPT() {
          const question = document.getElementById("question").value;

          const prompt = `この記事について質問です：

URL：
${location.href}

質問：
${question}
`;

          const url = "https://chat.openai.com/?q=" + encodeURIComponent(prompt);
          window.open(url, "_blank");
        }
        </script>
        ';
        return $content . $button;
    }
    return $content;
}
add_filter('the_content', 'add_chatgpt_button');
