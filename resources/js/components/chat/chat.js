import axios from 'axios';
import React, { useState, useEffect } from 'react'
import './chat.css'
function Chat() {
    var userInfo = JSON.parse(localStorage.getItem('userInfo') || "{}");
    var nameInput = userInfo.First_Name;
    var messageInput = document.getElementById("message");
    const [messages, setMessages] = useState([]);
    var connection, connectingSpan;
    useEffect(() => {
        updateMessages();
        window.WebSocket = window.WebSocket || window.MozWebSocket;
        try{
            connection = new WebSocket('ws://localhost:8080');
        } catch {
            connection.onerror = function (error) {
                connectingSpan.innerHTML = "Error occured";
            };
        }
        connectingSpan = document.getElementById("connecting");
        connection.onopen = function () {
            connectingSpan.style.display = "none";
        };
        connection.onmessage = function () { debugger; updateMessages(); }
    }, []);
    function updateMessages() {
        debugger;
        axios({
            method: 'get',
            url: process.env.MIX_API_PATH + '/getmessages',
            headers: {
                'content-type': 'application/json'
            },
        }).then((result) => {
            setMessages(result.data);
            var element = document.getElementById('display_message');
            element.scrollTop = element.scrollHeight - element.clientHeight;
        }).catch();
    }
    return (
        <div className="chatbot">
            <div id="chats" className="info-content">
                <div className="font-oswald d-flex flex-direction-row w-100 justify-center sideNavHeader">Chat</div>
                <div className="d-flex flex-direction-column chat-container" style={{ height: "450px" }}>
                    <div id="display_message" className="display_message">
                        {messages.map(message => {
                            return (
                                <div className="w-100 d-flex flex-direction-column" style={{ alignItems:(message.customer_id !== userInfo.ID) ? 'flex-start' : 'flex-end'}}>
                                    <p className="authorname" style={{ display:(message.customer_id !== userInfo.ID) ? 'd-block' : 'd-none'}}>{message.name}</p>
                                    <p className="d-block">{message.message}</p><br />
                                </div>
                            )
                        })}
                    </div>
                    <div id="connecting">Connecting to web sockets server...</div>
                    <form className="d-flex flex-direction-column w-100 chat-area">
                        <div className="d-flex flex-direction-row chatBox">
                            <textarea id="message" className="font-roboto" name="message" placeholder="Enter your Message" onKeyUp={handleKeyUp}></textarea>
                            <button className="btn submit" type="submit" onClick={sendMessage}>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    )

    function handleKeyUp(e) {
        if (e.keyCode === 13) {
            sendMessage();
        }
    }
    function sendMessage() {
        var name = nameInput.trim();
        let message = messageInput.value.trim();
        if (!message)
            return alert("Please write a message");
        axios({
            method: 'post',
            url: process.env.MIX_API_PATH + '/postmessage',
            headers: {
                'content-type': 'application/json'
            },
            data: { customer_id:userInfo.ID, name, message }
        }).then(result => {
            updateMessages();
        }).catch(error => {
        });
        messageInput.value = "";
    }
}
export default Chat