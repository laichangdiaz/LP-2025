package main

import (
	"encoding/json"
	"fmt"
	"net/http"
	"time"
)

var URL = "https://jsonplaceholder.typicode.com/posts"

var client *http.Client

type Posts struct {
	Posts []Post
}

type Post struct {
	UserId int    `json:"userId"`
	Id     int    `json:"id"`
	Title  string `json:"title"`
	Body   string `json:"body"`
}

func GetJson(url string, data interface{}) error {
	resp, err := http.Get(url)
	if err != nil {
		return err
	}
	defer resp.Body.Close()
	return json.NewDecoder(resp.Body).Decode(data)
}

func getPost() {
	var posts Posts
	err := GetJson(URL, &posts.Posts)
	if err != nil {
		fmt.Printf("%v", err.Error())
	} else {
		for i := 0; i < len(posts.Posts); i++ {
			fmt.Println(posts.Posts[i].Body)
			fmt.Println()
		}
	}
}

func main() {
	client = &http.Client{Timeout: time.Second * 10}
	getPost()
}
