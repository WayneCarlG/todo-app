git add .
echo "Enter Commit Message:"
read $cmsg
git commit -m $cmsg
git push
